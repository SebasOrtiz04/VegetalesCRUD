<template>
    <nav class="nav">
    <router-link to="/">Home</router-link>
    <router-link to="/admin">admin</router-link>
    </nav>
    <router-view/>
</template>

<script>
export default {

}
</script>

<style lang="scss">

@import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;700;900&display=swap');


$azul : #2a3295;
$blanco: #dedaed;
$negro:#181632;
$verde:#64d446;

html {
  box-sizing: border-box;
  font-family: 'Mulish', sans-serif;
}
*, *:before, *:after {
  box-sizing: inherit;
}
.nav{
    background-color:$azul;
    padding: 1rem;
    a {
        color:$blanco;
        text-decoration: none;
        margin: 1rem;
        text-transform:uppercase;
        font-weight: 700;
        transition: all .4s ease-in-out;
        &:hover{
            color:$verde;
        }

        &.router-link-exact-active {
            color: $verde;
        }
    }
}

</style>