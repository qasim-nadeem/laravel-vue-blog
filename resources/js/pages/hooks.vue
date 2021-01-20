<template>
    <div>
        <h1> Hooks in vue.js </h1>
        <div>
            <h4> Vue provide us following hook functions </h4>
            <ul>
                <li> created </li>
                <li> mounted </li>
                <li> beforeCreated </li>
            </ul>
        </div>
        <div>
            <h4> created </h4>
            <p>
                this hook is executed befor the html is rendered on the page, we can access our data members here but not the html. this is mostly
                used for making api calls and loading data.
            </p>
        </div>
        <div>
            <h4> mounted </h4>
            <p>
                this hook is executed after the html is rendered on the page, we can access our data members as well as the html.
            </p>
        </div>
        <div>
            <h4> beforeCreated </h4>
            <p>
                this hook is executed before even the data is initiated in data method. this is mostly used for making decision if user is
                allowd to access the page, its kind of a middlwear.
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
        };
    }
}
</script>
