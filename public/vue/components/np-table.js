    Vue.component('np-table', {
      template: `
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <div class="form-group search-panel">
                {{ item_title }}
                <br><small v-if="!spinner"> {{ trans('Showing') }} <b>{{pagination.from}}</b>-<b>{{pagination.to}}</b> {{ trans('From') }} <b>{{pagination.total}}</b> {{ trans('Results') }}</small>
                <slot name="right-buttons"></slot>
            </div>
            <div class="form-group">
                <input type="text" v-model="filterSearch" name="search-filter" class="form-control" :placeholder="trans('Search')">
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th v-if="is_sortable" > {{ trans('Sort') }} </th>
                            <th v-for="tH in tcontent" :class="tH.npClass"><span class="visible-lg-inline visible-md-inline"> {{ tH.title }}</span></th>
                            <th class="text-right"> <span class="hidden-xs"> {{ trans('Actions') }} </span></th>
                        </tr>
                    </thead>
                    <tbody :id="is_sortable ? 'sortable' : NULL">
                        <tr v-for="item in items">
                            <td v-if="is_sortable" class="hidden-xs noselect">                       
                                  <span class="handle" style="cursor: move;">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                {{item.sort}}
                            </td>
                            <td v-for="tB in tcontent" :class="tB.npClass">
                              <span v-if="tB.type == 'multilang'">
                                {{ item.i18n_first[tB.val].text }}
                              </span>
                              <span v-else-if="tB.type == 'multilang-rel'">
                                {{ item[tB.rel].i18n_first[tB.val].text }}
                              </span>
                              <span v-else-if="tB.type == 'normal'">
                                {{item[tB.val]}}
                              </span>
                              <span v-else-if="tB.type == 'status'"> 
                                <span v-bind:class="[ ( item.active == 1 ) ? 'label-success' : 'label-danger', 'label' ]">
                                      &nbsp;
                                      <span class="hidden-xs hidden-sm">{{ trans('Active') }}</span>
                                      &nbsp;
                                </span>
                              </span>
                            </td>
                            <td class="text-right">
                                <router-link v-if="actions.edit" :to="'/view/' + item.id" class="btn btn-primary btn-xs">
                                    <i class="fa fa-pencil fa-lg fa-fw"></i><span class="hidden-xs"></span>
                                </router-link>                       
                                <span  v-if="actions.delete" class="btn btn-xs btn-danger red" v-on:click="deleteItem(item.id)"><i class="fa fa-trash-o fa-lg fa-fw"></i></span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div v-if="pagination.last_page > 1" class="pagination mx-auto">
                <button class="btn btn-default" v-on:click="fetchItems(pagination.prev_item_url)" :disabled="!pagination.prev_item_url"><i class="fa fa-caret-left"></i></button>
                <span> <slot name="page"></slot> {{pagination.current_page}} <slot name="from"></slot> {{pagination.last_page}}</span>
                <button class="btn btn-default" v-on:click="fetchItems(pagination.next_item_url)" :disabled="!pagination.next_item_url"><i class="fa fa-caret-right"></i></button>
            </div>
            <br> 
        </div>
    </div>
    <div v-if="Object.keys(this.items).length === 0 && !spinner" class="alert alert-danger"> {{ trans('No results found') }} </div>
      <transition v-if="showModal" name="modal">
          <div class="modal-mask">
              <div class="modal-wrapper">
                  <div class="modal-container">

                      <div class="modal-header">
                          <slot name="modal-header">
                              default header
                          </slot>
                      </div>

                      <div class="modal-footer">
                            <button class="btn btn-default" @click="showModal = false"><slot name="modal-no">No</slot></button>
                            <button class="btn btn-success" @click="confirmDelete()"><slot name="modal-yes">Yes</slot></button>
                      </div>
                  </div>
              </div>
          </div>
      </transition>
    </div>
      `,
      props: ['items', 'pagination', 'controller', 'tcontent', 'spinner', 'item_title', 'actions', 'is_sortable'],
      data() {
        return{
            showModal: false,
            deleteId: '',
            filterSearch: '',
            filterQueryObject: {},
            filterQuery: ''
        }
      },
      mounted: function () {
        if (this.is_sortable) {
          this.setSortable()
        }
      },
      watch: {
        filterSearch: _.debounce( function (value) {
          this.filterQueryObject['search'] = value;

          this.filterQuery = httpBuildQuery(this.filterQueryObject);
          this.fetchItems()
        }, 300 ),
      },
      methods: {
        fetchItems: function (searchUrl) {
            searchUrl ? searchUrl = searchUrl + '&' + this.filterQuery : searchUrl =  '/api/' + this.controller + '/list?' + this.filterQuery;
            this.$parent.fetchItems(searchUrl)
        },
        deleteItem: function(id) {
          this.showModal = true;
          this.deleteId = id;
        },
        confirmDelete: function() {
          this.$http.post('/manage/' + this.controller + '/destroy', this.deleteId)
          .then(function (response) {
            this.msg = response.body.msg;
            this.showModal = false;
            this.deleteId = '';
            this.fetchItems();
          });
        },
        setSortable: function() {
          let vm = this;
          var self = this.$parent;
          this.$nextTick(function(){
            var sortable = Sortable.create(document.getElementById('sortable'), {
              onEnd: function(e) {
                var clonedItems = self.items.filter(function(item){
                 return item;
               });
                clonedItems.splice(e.newIndex, 0, clonedItems.splice(e.oldIndex, 1)[0]);
                _.forEach(clonedItems, function(value, key) {
                  value.sort = key+1;
                });
                self.items = [];
                self.$nextTick(function(){
                  self.items = clonedItems;
                  vm.saveResort();
                });
              }
            }); 
          });
        },
        saveResort: function() {
          this.$http.post('/manage/' + this.controller + '/resort', this.$parent.items)
          .then(function (response) {
            this.$parent.msg = trans('Updated!');
          }, function (response) {
            this.$parent.msg = trans('Error!');
          });
        }
      }
    })
