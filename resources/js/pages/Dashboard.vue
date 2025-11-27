<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
import {
  Card,
  CardContent,
  CardFooter,
} from '@/components/ui/card'

defineProps<{
    // admin 
    companyCount: number;
    partnerNetworkCount: number;
    careerResourceCount: number;
    employerCount: number;
    jobSeekerCount: number;
    freelancerCount: number;

    // employer
    categoryCount: number;
    jobCount: number;
    applicationCount: number;
}>();

  const page = usePage<any>()
const role = page.props.auth.user.role;
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout>
        <div
            class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4"
        >
            <div v-if="role === 'admin'" class="grid auto-rows-min gap-4 md:grid-cols-3">
                <Card>
                    <CardContent>
                    <p class="text-2xl font-bold">{{ companyCount }}</p>
                    </CardContent>
                    <CardFooter>
                    <p>Companies</p>
                    </CardFooter>
                </Card>
                <Card>
                    <CardContent>
                    <p class="text-2xl font-bold">{{ partnerNetworkCount }}</p>
                    </CardContent>
                    <CardFooter>
                    <p>Partner Networks</p>
                    </CardFooter>
                </Card>
                <Card>
                    <CardContent>
                    <p class="text-2xl font-bold">{{ careerResourceCount }}</p>
                    </CardContent>
                    <CardFooter>
                    <p>Career Resources</p>
                    </CardFooter>
                </Card>
                <Card>
                    <CardContent>
                    <p class="text-2xl font-bold">{{ employerCount }}</p>
                    </CardContent>
                    <CardFooter>
                    <p>Employers</p>
                    </CardFooter>
                </Card>
                <Card>
                    <CardContent>
                    <p class="text-2xl font-bold">{{ jobSeekerCount }}</p>
                    </CardContent>
                    <CardFooter>
                    <p>Job Seekers</p>
                    </CardFooter>
                </Card>
                <Card>
                    <CardContent>
                    <p class="text-2xl font-bold">{{ freelancerCount }}</p>
                    </CardContent>
                    <CardFooter>
                    <p>Freelancers</p>
                    </CardFooter>
                </Card>
            </div>

            <div v-if="role === 'employer'" class="grid auto-rows-min gap-4 md:grid-cols-3">
                <Card>
                    <CardContent>
                    <p class="text-2xl font-bold">{{ categoryCount }}</p>
                    </CardContent>
                    <CardFooter>
                    <p>Categories</p>
                    </CardFooter>
                </Card>
                <Card>
                    <CardContent>
                    <p class="text-2xl font-bold">{{ jobCount }}</p>
                    </CardContent>
                    <CardFooter>
                    <p>Jobs</p>
                    </CardFooter>
                </Card>
                <Card>
                    <CardContent>
                    <p class="text-2xl font-bold">{{ applicationCount }}</p>
                    </CardContent>
                    <CardFooter>
                    <p>Applications</p>
                    </CardFooter>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
