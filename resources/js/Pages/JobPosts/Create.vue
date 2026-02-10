<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    title: '',
    company: '',
    description: '',
    location: '',
    salary: ''
})

function submit() {
    form.post('/jobposts')
}
</script>

<template>
<div class="p-6 max-w-lg">

<h1 class="text-2xl font-bold mb-4">
Create Job Post
</h1>

<form @submit.prevent="submit">

<input v-model="form.title"
placeholder="Job Title"
class="border p-2 w-full mb-3"/>

<input v-model="form.company"
placeholder="Company"
class="border p-2 w-full mb-3"/>

<textarea v-model="form.description"
placeholder="Description"
class="border p-2 w-full mb-3"></textarea>

<input v-model="form.location"
placeholder="Location"
class="border p-2 w-full mb-3"/>

<input v-model="form.salary"
placeholder="Salary"
type="number"
class="border p-2 w-full mb-3"/>

<button
class="bg-green-500 text-white px-4 py-2 rounded">
Save Job Post
</button>

</form>

<Link href="/dashboard"
class="block mt-4 text-blue-500">
Back to Dashboard
</Link>

</div>
</template>
