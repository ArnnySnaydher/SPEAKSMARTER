<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { Link } from '@inertiajs/vue3'
import {Inertia} from  "@inertiajs/inertia";

defineProps({
    categories:{
        type:Object,
        required:true,
    }
})

const deleteCategory=(id)=>{
    if(confirm('Are you sure?')){
        Inertia.delete(route('categories.destroy',id))
    }
}
</script>
<template >
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between" v-if="$page.props.user.permissions.includes('create categories')">
                        <Link :href="route('categories.create')" class="text-white bg-indigo-500 hover:bg-indigo-700 py-2 px-4 rounded ">
                            CREATE CATEGORIES
                        </Link>
                        
                    </div>

                </div>

                <div class="mt-4">
                    <ul role="list" class="divide-y divide-gray-100">
                        <li class="flex justify-between gap-x-6 py-5" v-for="category in categories.data">
                            <div class="flex min-w-0 gap-x-4">
                            <div class="min-w-0 flex-auto">
                                <p class="text-lg font-semibold leading-6 text-gray-900">{{category.name}}</p>
                            </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-md leading-6 text-gray-900">
                                <Link class="py-2 px-4" :href="route('categories.edit',category.id) " v-if="$page.props.user.permissions.includes('update categories')" >Edit</Link>
                                <Link class="py-2 px-4 text-red-400" @click="deleteCategory(category.id)" v-if="$page.props.user.permissions.includes('delete categories')">Delete</Link>
                            </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-between mt-2">
                    
                        <Link v-if="categories.current_page > 1" :href="categories.prev_page_url" class="py-2 px-4 rounded ">
                            PREV
                        </Link>
                        <div v-else></div>
                        <Link  v-if="categories.current_page < categories.last_page" :href="categories.next_page_url" class=" py-2 px-4 rounded ">
                            NEXT
                        </Link>
                        <div v-else></div>
                        
                        
                </div>

            </div>
        </div>
    </AppLayout>
</template>