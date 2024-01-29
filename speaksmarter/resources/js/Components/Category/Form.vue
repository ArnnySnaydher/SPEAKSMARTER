<script setup>

import FormSection from '../FormSection.vue';
import InputError from '../InputError.vue';
import InputLabel from '../InputLabel.vue';
import PrimaryButton from '../PrimaryButton.vue';
import TextInput from '../TextInput.vue';
defineProps({
    form: {
        typeof: Object,
        required: true
    },
    updating: {
        typeof: Boolean,
        required: false,
        default: false
    }

})

defineEmits(['submit'])

</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{updating ? 'Update Category':'Create new Category'}}
        </template>
        <template #description>
            {{updating ? 'Update The Selected Category' : "Create a New Category from Scratch"}}
        </template>
        <template #form>
            <div class="col-span-6" sm:col-span-6>
                <InputLabel for="name" value="Name"/>
                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"  autocomplete="name"/>
                <InputError :message="$page.props.errors.name" class="mt-2"></InputError>
            </div>
        </template>
        <template #actions>
            <primary-button >{{updating ? 'Update':'Create'}}</primary-button>
        </template>
    </FormSection>
</template>