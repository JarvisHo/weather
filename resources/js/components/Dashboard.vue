<template>

</template>

<script>
    import AppHeader from "./AppHeader";
    import AppCapsule from "./AppCapsule";
    import AppMenu from "./AppMenu";

    export default {
        components: {
            AppHeader,
            AppCapsule,
            AppMenu
        },
        mounted() {
            /** 測試站直接授權 */
            const data = { email: 'john@email.com', password: 'password' }
            this.$store.dispatch("login", data);
        },
        created() {
        }
    }
</script>
