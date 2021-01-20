<template>
    <div>
        <h1> New Component </h1>
        <router-link :to="{ name: 'blog' }">blog</router-link>
        <router-link :to="{ name: 'hooks' }">Vue Hooks</router-link>
        <router-link :to="{ name: 'methods' }">Methods</router-link>
        <router-link :to="{ name: 'loopcondition' }">Loops and Conditions</router-link>
        <router-view></router-view>
    </div>
</template>
