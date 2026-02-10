<template>
    <Headers />
    <RouterView />
    <Footers />
</template>
<script setup>
    
    import Headers from './headers.vue';
    import Footers from './footers.vue';
    import { Main } from '../../plugins/main';
    import { onMounted, watch, ref } from "vue";
    import { useRoute } from "vue-router";

    const route = useRoute()

    function initializePlugins(){
        setTimeout(()=>{
            Main()
        },0)
    }

    onMounted(()=>{
        initializePlugins()
    })

    watch(route,()=>{
        initializePlugins()
    })

</script>
<style>

</style>    