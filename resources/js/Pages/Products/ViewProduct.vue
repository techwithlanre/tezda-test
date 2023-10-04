<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import {Link} from '@inertiajs/vue3'


const props = defineProps({
    product: Object
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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-10 p-5">
                    <div class="flex flex-row gap-x-5">
                        <img :src="product.image" class="w-[400px] rounded-xl" alt="">
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-col">
                                <h3 class="text-2xl font-bold">{{ product.name }}</h3>
                                <div class="">
                                    {{  product.description }}
                                </div>
                                <p class="mt-4 font-bold bg-gray-100 text-purple-500 px-5 py-3 border border-purple-200 rounded-full w-max">${{ product.price }}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
