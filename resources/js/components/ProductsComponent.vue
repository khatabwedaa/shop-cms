<template>
    <div>
        <div class="sm:flex justify-between items-center">
            <input v-model="keyword" class="form-input w-full sm:max-w-sm" type="text" placeholder="بحث...">

            <new-product></new-product>
        </div>

        <div class="flex flex-col py-20">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-800">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">
                                        اسم المنتج
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">
                                        سعر القطعة
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">
                                        الكمية
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr v-for="product in productsList" :key="product.id">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <h3 class="text-gray-800 text-lg capitalize text-right">{{ product.name }}</h3> 
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <h3 class="text-gray-700 text-lg capitalize text-right">${{ product.price }}</h3> 
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <h3 class="text-gray-700 text-lg capitalize text-right">{{ product.total }}</h3> 
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center justify-between">
                                            <button @click="decrement(product.id)" class="mt-3 py-2 px-4 text-sm capitalize tracking-wide bg-gray-800 text-white font-medium rounded hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                </svg>
                                            </button>

                                            <button @click="destroy(product.id)" class="mr-2 mt-3 py-2 px-4 text-sm capitalize tracking-wide bg-red-500 text-white font-medium rounded hover:bg-red-400 focus:outline-none focus:bg-red-400">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-10">
            <div class="px-5 py-3 w-full bg-white rounded shadow-sm" v-for="product in productsList" :key="product.id">
                <h3 class="text-gray-800 text-lg capitalize">{{ product.name }}</h3>

                <div class="flex justify-between items-center font-nunito text-gray-700 mt-3">
                    <span>{{ product.total }}</span>
                    <span>${{ product.price }}</span>
                </div>

                <div class="flex items-center justify-between">
                    <button @click="decrement(product.id)" class="mt-3 py-2 px-4 text-sm capitalize tracking-wide bg-gray-800 text-white font-medium rounded hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </button>

                    <button @click="destroy(product.id)" class="mt-3 py-2 px-4 text-sm capitalize tracking-wide bg-red-500 text-white font-medium rounded hover:bg-red-400 focus:outline-none focus:bg-red-400">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div> -->
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
            },

            destroy(id) {
                axios.delete('/products/' + id)
                    .then(() => { window.location.reload() });
            },

            decrement(id) {
                axios.post('/products/' + id + '/sold')
                    .then(() => { window.location.reload() });
            },
        }
    }
</script>