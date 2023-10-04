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
                        <div class=" bg-red-300 w-32 h-32 max-w-xl rounded-full bg-cover
                        bg-[url('https://www-konga-com-res.cloudinary.com/w_400,f_auto,fl_lossy,dpr_3.0,q_auto/media/catalog/product/V/D/67343_1663481920.jpg')] bg-center">
                            
                        </div>
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-col">
                                <h3 class="text-2xl font-bold">{{ product.name }}</h3>
                                <div class="">
                                    {{  product.description }}
                                </div>
                                <p class="mt-4 font-bold">${{ product.price }}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
