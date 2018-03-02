    Vue.component('single-image', {
    template: `
          <div v-if="!item[field]" :class="errors[field] ? 'form-group has-error' : 'form-group'">
          <label :for="field"> 
            {{ trans('Изберете изображение') }}
            <i v-if="required" class="fa fa-exclamation-circle text-danger tip" data-original-title="required"></i>
          </label>
          <input type="file" @change="onFileChange" class="form-control">
          <small v-if="errors[field]" class="text-danger"> {{ errors[field] }} </small>
        </div>
        <div v-else>
          <div class="form-group">
            <img class="single-image img-responsive" :src="item[field]" />
          </div>
          <div class="form-group">
            <button class="btn btn-danger" @click="removeImage">{{ trans('Изтрий изображение') }}</button>
          </div>
        </div>
    `,
    props: ['item', 'errors', 'field', 'required'],
    methods: {
      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        if (!files.length)
          return;
        this.createImage(files[0]);
      },
      createImage(file) {
        var image = new Image();
        var reader = new FileReader();
        var vm = this;
        
        reader.onload = (e) => {
          vm.item.pic = e.target.result;
        };
        reader.readAsDataURL(file);
      },
      removeImage: function (e) {
        this.item.pic = '';
      }
    }
    })
