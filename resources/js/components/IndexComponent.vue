<template>
    <div>
        <router-link :to="{name: 'category.index' }">Users</router-link>
        <router-link :to="{name: 'category.creat' }">Add</router-link>
       <router-view></router-view>
    </div>
</template>

<script>

export default {
    name: "IndexComponent",
    data() {
        return {

        };
    }

}
</script>

<style scoped>

</style>
