<script setup>
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import CategoryForm from '@/Components/Category/Form.vue'

const form = useForm({
    name: ''
})
</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Create Category</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm-rounded-lg">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <CategoryForm :form="form" @submit="form.post(route('categories.store'))"
                                v-if="$page.props.user.permissions.includes('create categories')">
                            </CategoryForm>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>