<script setup>

import FormSection from '../FormSection.vue';
import InputError from '../InputError.vue';
import InputLabel from '../InputLabel.vue';
import PrimaryButton from '../PrimaryButton.vue';
import TextInput from '../TextInput.vue';
import SecondaryButton from '../SecondaryButton.vue';
import CollectionSelector from  '../Common/CollectionSelector.vue'

defineProps({
    form: {
        typeof: Object,
        required: true
    },
    updating: {
        typeof: Boolean,
        required: false,
        default: false
    },
    categories:{
        typeof:Object,
        required:true
    },
    levels:{
        typeof:Object,
        required:true
    }

})

defineEmits(['submit'])

</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{updating ? 'Update Lesson':'Create new Lesson'}}
        </template>
        <template #description>
            {{updating ? 'Update The Selected Lesson' : "Create a New Lesson from Scratch"}}
        </template>
        <template #form>
            <div class="col-span-6" sm:col-span-6>
                <InputLabel for="name" value="Name"/>
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"  autocomplete="name"/>
                <InputError :message="$page.props.errors.name" class="mt-2"></InputError>
                
                <InputLabel for="description" value="Description"/>
                <TextInput id="description" type="text" class="mt-1 block w-full" v-model="form.description"  autocomplete="description"/>
                <InputError :message="$page.props.errors.description" class="mt-2"></InputError>
                
                <InputLabel for="image_uri" value="Image URI"/>
                <TextInput id="image_uri" type="text" class="mt-1 block w-full" v-model="form.image_uri"  autocomplete="image_uri"/>
                <InputError :message="$page.props.errors.image_uri" class="mt-2"></InputError>
               
                <InputLabel for="content_uri" value="Content URI"/>
                <TextInput id="content_uri" type="text" class="mt-1 block w-full" v-model="form.content_uri"  autocomplete="content_uri"/>
                <InputError :message="$page.props.errors.content_uri" class="mt-2"></InputError>
               
                <InputLabel value="PDF"/>
                <SecondaryButton class="mt-2 mr-2" type="button">Upload PDF</SecondaryButton>
                <InputError :message="$page.props.errors.pdf_uri" class="mt-2"></InputError>

                <InputLabel for="level_id" value="Level"/>
                <select name="level_id" value="level">
                    <option v-for="level in levels" :value="level_id" >{{level.name}}</option>
                </select>
                <InputError :message="$page.props.errors.level_id" class="mt-2"></InputError>

                <CollectionSelector :collection="categories">
                </CollectionSelector>
            
            </div>
        </template>
        <template #actions>
            <primary-button >{{updating ? 'Update':'Create'}}</primary-button>
        </template>
    </FormSection>
</template>