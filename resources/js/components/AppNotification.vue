<template>
    <div class="alert alert-outline-primary alert-dismissible bg-white fade show alert-font-size p-3"
         v-if="notification === true" v-on:click="hideNotification"
         role="alert" style="border: 3px solid #0E3175;">
        <span class="text-black">{{ message }}</span>
        <button type="button" class="btn btn-icon btn-primary me-1 rounded-circle"
                data-bs-dismiss="alert" aria-label="Close" style="float: right; margin-top: -6px">
            <ion-icon name="close-outline"></ion-icon>
        </button>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'

export default {
    name: "AppNotification",
    methods: {
        hideNotification() {
            this.$store.dispatch('hideNotification')
        }
    },
    computed: {
        ...mapGetters([
            'notification',
            'message',
        ])
    },
}
</script>
