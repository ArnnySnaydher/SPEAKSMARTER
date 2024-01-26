<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>

        <button v-if="$page.props.user.permissions.includes('create roles')">Create Roles</button>
        <button v-if="$page.props.user.permissions.includes('create lessons')">Create new Lessons</button>
        
    </div>
</template>
<style scoped>

button{
    background-color: cornflowerblue;
    color: black;
    padding: 20px;
    margin: 5px;
    border-radius: 12px;
}
</style>
