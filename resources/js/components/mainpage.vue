<template>
    <div>
        <h1> New Component </h1>
        <router-link :to="{ name: 'blog' }">blog</router-link>
        <router-view></router-view>
    </div>
</template>
