<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    jobPosts: Array
})
</script>

<template>
<div class="p-6">

<h1 class="text-2xl font-bold mb-4">
Job Posting Dashboard
</h1>

<p>
User Name: {{$page.props.auth.user.name}}
</p>

<p class="mb-4">
User Email: {{$page.props.auth.user.email}}
</p>

<Link href="/jobposts/create"
class="bg-blue-500 text-white px-4 py-2 rounded">
Add Job Post
</Link>

<div class="mt-6">

<h2 class="text-xl font-semibold mb-3">
Job Posts
</h2>

<div
v-for="job in jobPosts"
:key="job.id"
class="border p-3 rounded mb-3">

<h3 class="font-bold text-lg">
{{ job.title }}
</h3>

<p>{{ job.company }}</p>
<p>{{ job.description }}</p>

<p v-if="job.location">
Location: {{ job.location }}
</p>

<p v-if="job.salary">
Salary: ₱ {{ job.salary }}
</p>

</div>

</div>

</div>
</template>
