<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import {Link} from '@inertiajs/vue3'


const props = defineProps({
    products: Array
});

var excerpt = function(text, length, clamp){
    clamp = clamp || '...';
    var node = document.createElement('div');
    node.innerHTML = text;
    var content = node.textContent;
    return content.length > length ? content.slice(0, length) + clamp : content;
};

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
                            <th>Image</th>
                            <th class="text-left px-5 py-3">Name</th>
                            <th class="text-left px-5 py-3">Description</th>
                            <th class="text-left px-5 py-3">Price</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="product in products.data">
                            <td class="px-5 py-3 w-20"><Link :href="route('products.show', product.id)"><img :src="product.image" class="w-10 h-10 rounded-full" alt=""></Link></td>
                            <td class="text-left px-5 py-3"><Link :href="route('products.show', product.id)">{{ product.name }}</Link></td>
                            <td class="text-left px-5 py-3"><Link :href="route('products.show', product.id)">{{ excerpt(product.description, 120) }}</Link></td>
                            <td class="text-left px-5 py-3"><Link :href="route('products.show', product.id)">{{ product.price }}</Link></td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>