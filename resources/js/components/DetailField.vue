<template>
    <panel-item :field="field">
        <p slot="value" class="text-90 flex">
            <span :class="optionClass()">{{ bool }}</span>
        </p>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],

    data: () => ({
      bool: null,
    }),

    mounted() {
        if(Boolean(this.field.value)) {
            this.bool = this.field.labels[1];
        }
        else{
            this.bool = this.field.labels[0];
        }
    },

    methods: {
        optionClass() {
            if(this.field.colorLabels) {
                return {
                    'text-success': Boolean(this.field.value) ? this.field.labels[1] : false,
                    'text-danger': Boolean(this.field.value) ? this.field.labels[0] : true,
                }
            }
        },
    },
}
</script>
