    Vue.component('multilang-text', {
    template: `
    <div :class="errors['lang_fields.'+ field +'.'+l.lang+'.text'] ? 'form-group has-error' : 'form-group'">
      <label :for="field"> <slot name="label"></slot>
        <span :class="'flag-icon flag-icon-' + clang"></span> 
        <i class="fa fa-exclamation-circle text-danger tip" data-original-title="required"></i>
      </label>
      <input v-if="input_type == 'text'" type="text" v-model="item.lang_fields[field][l.lang].text" class="form-control"  v-focus="{ error: errors['lang_fields.'+ field +'.'+l.lang+'.text'] }">
      <textarea v-if="input_type == 'textarea'" class="form-control" v-model="item.lang_fields[field][l.lang].text" cols="20" rows="5"  v-focus="{ error: errors['lang_fields.'+ field +'.'+l.lang+'.text'] }"></textarea>
      <small v-if="errors['lang_fields.'+ field +'.'+l.lang+'.text']" class="text-danger"> {{ errors['lang_fields.'+ field +'.'+l.lang+'.text'][0] }} </small>
    </div>
    `,
    props: ['l', 'item', 'errors', 'clang', 'field', 'input_type']
    })
