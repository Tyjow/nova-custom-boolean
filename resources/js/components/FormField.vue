<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <div class="w-full max-col-2">
                <div class="flex mb-2">
                    <checkbox
                            class="pr-2"
                            @input="toggle"
                            :id="field.attribute"
                            :name="field.name"
                            :checked="checked"
                            :disabled="isReadonly"
                    />
                    <label
                            :for="field.name"
                            v-text="bool"
                            class="w-full"
                            :class="optionClass()"
                    ></label>
                </div>
            </div>
        </template>
    </default-field>
</template>

<script>
  import { Errors, FormField, HandlesValidationErrors } from 'laravel-nova'
  
  export default {
    mixins: [HandlesValidationErrors, FormField],
    data: () => ({
      value: false,
      bool: null,
    }),
    mounted() {
      this.value = this.field.value || false
        if(this.value) {
            this.bool = this.field.labels[1];
        }
        else{
            this.bool = this.field.labels[0];
        }
      this.field.fill = formData => {
        formData.append(this.field.attribute, this.trueValue)
      }
    },
    methods: {
      toggle() {
        this.value = !this.value
        if(this.value) {
            this.bool = this.field.labels[1];
        }
        else{
            this.bool = this.field.labels[0];
        }
      },
      optionClass() {
            if(this.field.colorLabels) {
                return {
                    'text-success': this.value ? this.field.labels[1] : false,
                    'text-danger': this.value ? this.field.labels[0] : true,
                }
            }
        },
    },
    computed: {
      checked() {
        return Boolean(this.value)
      },
      trueValue() {
        return +this.checked
      },
    },
  }
</script>
