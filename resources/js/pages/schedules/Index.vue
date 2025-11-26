<script setup lang="ts">

// Shadcn ui 
import Button from "@/components/ui/button/Button.vue";
import Label from "@/components/ui/label/Label.vue";
import {
  Select,
  SelectTrigger,
  SelectValue,
  SelectContent,
  SelectItem
} from "@/components/ui/select";
import Calendar  from "@/components/ui/calendar/Calendar.vue";
import Input from "@/components/ui/input/Input.vue";

// Custom components 
import AppLayout from '@/layouts/AppLayout.vue';

// Type
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
import dayjs from "dayjs";
import Textarea from "@/components/ui/textarea/Textarea.vue";
import ScheduleController from "@/actions/App/Http/Controllers/ScheduleController";
import Card from "@/components/ui/card/Card.vue";

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Schedules',
        href: '#'
    },
];

const props = defineProps({
    schedules: Array
})
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div
            class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
        >
           <Card class="shadow p-6" v-for="schedule in schedules" :key="schedule.id">
            <h2 class="text-xl font-semibold mb-2">Interview Schedule</h2>
            <p>Congratulation {{ schedule.candidate.name }}!</p>
            <p>We viewed your resume and we accepted that you'd be an appropriate candidate. So we sent you that schedule interview. Thanks for your interest.</p>
            <p>Hi {{ schedule.candidate.name }},</p>

            <p>Thank you for applying for the position of {{ schedule.job.title }}.</p>
            <p>After reviewing your resume, we are pleased to inform you that you have been shortlisted for an interview.</p>
            
            <p>If you are available, we would like to meet up with you at {{ schedule.interview_time }}</p>

            <p>Thank you again for your interest in joining us.</p>
            <p>We look forward to speaking with you soon.</p>

            <p>Best regards,</p>
            {{ schedule.employer.name }}
        </Card>
        </div>
    </AppLayout>
</template>
