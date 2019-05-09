Nova.booting((Vue, router, store) => {
    Vue.component('index-nova-custom-boolean', require('./components/IndexField'))
    Vue.component('detail-nova-custom-boolean', require('./components/DetailField'))
    Vue.component('form-nova-custom-boolean', require('./components/FormField'))
})
