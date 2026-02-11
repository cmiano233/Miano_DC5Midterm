<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    jobPosts: Array
})
</script>

<template>
<div class="p-6 max-w-6xl mx-auto">

<!-- Header -->
<div class="mb-6">
    <h1 class="text-3xl font-bold">
        Job Posting & Applicant Tracker
    </h1>

    <p class="text-sm text-gray-600">
        Logged in as
        <strong>{{ $page.props.auth.user.name }}</strong>
        ({{ $page.props.auth.user.email }})
    </p>
</div>

<!-- Add Job Button -->
<Link
href="/jobposts/create"
class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded mb-8">
➕ Add Job Post
</Link>

<!-- Job Posts Section -->
<h2 class="text-2xl font-semibold mb-4">
Job Posts
</h2>

<!-- Empty State -->
<div
v-if="jobPosts.length === 0"
class="text-gray-500 italic border p-4 rounded">
No job posts available.
</div>

<!-- Job Cards -->
<div
v-for="job in jobPosts"
:key="job.id"
class="border rounded-lg p-5 mb-5 shadow-sm bg-white">

<!-- Job Header -->
<div class="flex justify-between items-start">
    <div>
        <h3 class="text-xl font-bold">
            {{ job.title }}
        </h3>

        <p class="text-gray-700">
            Company: {{ job.company }}
        </p>
    </div>

    <!-- Applicant Count Badge -->
    <span
    class="bg-gray-200 text-gray-800 text-sm px-3 py-1 rounded-full">
        {{ job.applicants?.length || 0 }} Applicants
    </span>
</div>

<!-- Job Details -->
<p class="mt-3">
    {{ job.description }}
</p>

<div class="mt-2 text-sm">
    <p v-if="job.location">📍 {{ job.location }}</p>
    <p v-if="job.salary">💰 ₱ {{ job.salary }}</p>
</div>

<!-- Applicant Preview -->
<div class="mt-4">
    <h4 class="font-semibold mb-2">
        Applicants
    </h4>

    <div
    v-if="job.applicants && job.applicants.length > 0"
    class="space-y-1">
        <div
        v-for="applicant in job.applicants"
        :key="applicant.id"
        class="text-sm border-b pb-1">
            {{ applicant.name }} — {{ applicant.email }}
            <span class="text-gray-500">
                ({{ applicant.status }})
            </span>
        </div>
    </div>

    <p
    v-else
    class="text-sm text-gray-500 italic">
        No applicants yet.
    </p>
</div>

<!-- Applicant Action -->
<Link
:href="`/applicants/create/${job.id}`"
class="inline-block mt-4 text-blue-600 hover:underline">
➕ Add Applicant
</Link>

</div>

</div>
</template>
