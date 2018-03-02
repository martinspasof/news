    Vue.component('input-all', {
    template: `
       <div :class="errors[field] ? 'form-group has-error' : 'form-group'">
       <label :for="field"> 
          <slot name="label"></slot>
          <i v-if="required" class="fa fa-exclamation-circle text-danger tip" data-original-title="required"></i>
       </label>
          <input v-if="input_type == 'text'" type="text" class="form-control"  v-model="item[field]" v-focus="{ error: errors[field] }">
          <textarea v-if="input_type == 'textarea'" class="form-control" v-model="item[field]" v-focus="{ error: errors[field] }"></textarea>
          <select v-if="input_type == 'select'" class="form-control"  v-model="item[field]">
            <option v-for="opt in options" :value="opt.id"> {{ opt.i18n_first[0].text }} </option>
          </select>
          <textarea v-if="input_type == 'textarea'" class="form-control" v-model="item[field]" v-focus="{ error: errors[field] }"></textarea>
          <small v-if="errors[field]" class="text-danger"> {{ errors[field] }} </small>
       </div>
    `,
    props: ['item', 'errors', 'field', 'input_type', 'required', 'options']
    })
