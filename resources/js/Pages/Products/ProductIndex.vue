<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import {Link} from '@inertiajs/vue3'


const props = defineProps({
    products: Array
});

</script>

<template>
    <Head title="Products" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-row justify-end">
                    <Link :href="route('products.create')">
                        <SecondaryButton class="">Create Product</SecondaryButton>
                    </Link>
                </div>
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-10">
                    <table class="table-auto">
                        <thead>
                          <tr>
                            <th class="text-left px-5 py-3">Name</th>
                            <th class="text-left px-5 py-3">Description</th>
                            <th class="text-left px-5 py-3">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="product in products.data">
                            <td class="text-left px-5 py-3"><Link :href="route('products.show', product.id)">{{ product.name }}</Link></td>
                            <td class="text-left px-5 py-3">{{ product.description }}</td>
                            <td class="text-left px-5 py-3">{{ product.price }}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>