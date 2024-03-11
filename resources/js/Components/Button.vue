<script setup>
defineProps({
    type: {
        type: String,
        default: "button",
    },
    disabled: {
        type: Boolean,
        default: false,
    },
    onClick: {
        type: Function,
        default: () => {},
    },
});
</script>

<template>
    <button
        :type="type"
        :disabled="disabled"
        :class="`w-full rounded-md py-2 px-4 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-opacity-50`"
        @click="onClick"
    >
        <slot />
    </button>
</template>
