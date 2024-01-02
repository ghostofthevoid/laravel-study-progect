<template>
    <div class="w-25">
        <div class="mb-3">
            <input type="text" class="form-control" v-model="title" name="title" placeholder="Category name">
        </div>
        <div class="mb-3">
            <button @click.prevent="store" type="submit" class="btn btn-dark">Submit</button>
        </div>
    </div>
</template>

<script>
import router from "../../router";

export default {
    name: "Creat",

    data() {
        return {
            title: null
        }
    },

    methods: {
        store() {
            axios.post('/api/categories', {title: this.title})
                .then(res => {
                    router.push({name: 'category.index'});
                })
        }
    }
}
</script>

<style scoped>

</style>
