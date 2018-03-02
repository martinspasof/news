    Vue.component('tagsInput', {
      template: `<div class="tags" id="tagsInput-template">
      <input class="form-control" v-model="newTag" placeholder="Add" @keyup.enter="add()" :readonly="readonly"/>
      <span class="asInput btn btn-warning" v-for="(tag, index) in tags2">{{tag}}<span class="text-danger" @click="checkIfRemove(index)"><i class="fa fa-trash-o fa-lg fa-fw"></i></span></span>
      </div>`,
      props: ['tags', 'readonly'],
      data(){
        return{
          newTag: '',
          confirmWaiting: false,
          position: 0
        }
      },
      computed: {
        tags2: function() {
          return this.tags
        }
      },
      methods: {
        add() {
          if (this.newTag != '') {
            this.tags.splice(this.position, 0, this.newTag)
            this.position += 1
            this.newTag = ''
          }
        },
        checkIfRemove(index) {
          this.tags.splice(index, 1);
        },
        left() {
          var pos = event.target.selectionStart;
          if(pos===0) {
            this.position = Math.max(0, this.position-1);
          }
          var evt = event
          setTimeout(function() {
            console.log(evt.target)
            evt.target.focus()
          }, 1300)
        },
        right() {
          var pos = event.target.selectionStart;
          if(pos===this.newTag.length) {
            this.position = Math.min(this.tags.length, this.position+1);
          }
          var evt = event
          setTimeout(function() {
            evt.target.focus()
          }, 200)
        }
      }
    })
