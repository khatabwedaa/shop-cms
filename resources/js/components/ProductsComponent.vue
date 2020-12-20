<template>
    <div>
        <div class="sm:flex justify-between items-center">
            <input v-model="keyword" class="form-input w-full sm:max-w-sm" type="text" placeholder="Search...">

            <new-product></new-product>
        </div>

        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10">
            <div class="px-5 py-3 w-full bg-white rounded shadow-sm" v-for="product in productsList" :key="product.id">
                <h3 class="text-gray-800 text-lg">{{ product.name }}</h3>

                <div class="flex justify-between items-center text-gray-700 mt-3">
                    <span>{{ product.total }}</span>
                    <span>${{ product.price }}</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import NewProduct from "./NewProduct";

    export default {
        props: ['products'],

        components: { NewProduct },

        data() {
            return {
                productsList: this.products,
                keyword: null,
            }
        },

         watch: {
            keyword(after, before) {
                this.fetch();
            }
        },

        methods: {
            fetch() {
                if(this.keyword == '') return this.productsList = this.products;

                axios.get('/search', { params: { keyword: this.keyword } })
                    .then(response => this.productsList = response.data)
                    .catch(error => {});
                }
        }
    }
</script>