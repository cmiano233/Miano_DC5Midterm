<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const props = defineProps({
    jobPost: Object
})

const form = useForm({
    job_post_id: props.jobPost.id,
    name: '',
    email: ''
})

function submit() {
    form.post('/applicants')
}
</script>

<template>
<div class="p-6 max-w-lg">

<h1 class="text-2xl font-bold mb-4">
Apply for {{ jobPost.title }}
</h1>

<form @submit.prevent="submit">

<input
v-model="form.name"
placeholder="Applicant Name"
class="border p-2 w-full mb-3" />

<input
v-model="form.email"
placeholder="Applicant Email"
class="border p-2 w-full mb-3" />

<button
class="bg-green-500 text-white px-4 py-2 rounded">
Submit Application
</button>

</form>

<Link href="/dashboard" class="block mt-4 text-blue-500">
Back to Dashboard
</Link>

</div>
</template>
