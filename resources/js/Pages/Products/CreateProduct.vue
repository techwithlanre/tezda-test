<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import {useForm} from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


const form = useForm({
    name: '',
    description: '',
    price: '',
    image: ''
});



const submit = () => {
    form.post(route('products.store'), {
        
    });
}

</script>

<template>
    <Head title="Products" />
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-10">               
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-10">
                    <form @submit.prevent="submit" class="p-10">
                        <div>
                            <InputLabel for="name" value="Name" />
            
                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                autocomplete="name"
                            />
            
                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="description" value="Description" />
            
                            <TextInput
                                id="description"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.description"
                                autocomplete="description"
                            />
            
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="name" value="Price" />
            
                            <TextInput
                                id="name"
                                type="number"
                                class="mt-1 block w-full"
                                v-model="form.price"
                                autocomplete="name"
                            />
            
                            <InputError class="mt-2" :message="form.errors.price" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Create Product
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>