<template>
    <NotesList endpoint="/api/notes" />
</template>

<script>
    import NotesList from '../components/NotesList';

    export default {
        name: "NotesIndex",

        components: {
            NotesList
        }
    }
</script>

<style scoped>

</style>
