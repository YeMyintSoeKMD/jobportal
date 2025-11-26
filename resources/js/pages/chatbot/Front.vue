<template>
  <div class="min-h-screen bg-slate-50 p-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-4 gap-6">
      <!-- Left: Conversations list -->
      <aside class="lg:col-span-1">
        <Card class="h-full flex flex-col">
          <CardHeader>
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <Avatar><img src="/images/avatar-1.jpg" alt="You"/></Avatar>
                <div>
                  <p class="font-semibold">Me</p>
                  <p class="text-xs text-muted-foreground">Online</p>
                </div>
              </div>
              <Button variant="ghost" size="sm" title="New chat">
                <Plus />
              </Button>
            </div>
          </CardHeader>

          <CardContent class="flex-1 overflow-auto px-0">
            <div class="divide-y">
              <button class="w-full text-left px-4 py-3 hover:bg-slate-50 flex items-start gap-3">
                <Avatar size="sm"><img src="/images/avatar-2.jpg" alt="Anna"/></Avatar>
                <div class="flex-1">
                  <div class="flex items-center justify-between">
                    <p class="font-medium">Anna Clarke</p>
                    <span class="text-xs text-muted-foreground">2:14 PM</span>
                  </div>
                  <p class="text-sm text-muted-foreground truncate">Sounds good — I'll send the files now.</p>
                </div>
              </button>

              <button class="w-full text-left px-4 py-3 hover:bg-slate-50 flex items-start gap-3">
                <Avatar size="sm" class="relative">
                  <img src="/images/avatar-3.jpg" alt="Samuel"/>
                  <span class="absolute -top-0.5 -right-0.5 bg-rose-500 rounded-full w-3 h-3 border-2 border-white"></span>
                </Avatar>
                <div class="flex-1">
                  <div class="flex items-center justify-between">
                    <p class="font-medium">Samuel</p>
                    <span class="text-xs text-muted-foreground">yesterday</span>
                  </div>
                  <p class="text-sm text-muted-foreground truncate">Got it — thanks!</p>
                </div>
              </button>

              <!-- more conversations... -->
            </div>
          </CardContent>

          <CardFooter>
            <Input placeholder="Search conversations..." />
          </CardFooter>
        </Card>
      </aside>

      <!-- Middle: Messages area -->
      <main class="lg:col-span-3 grid grid-rows-[auto,1fr,auto]">
        <Card class="h-full flex flex-col">
          <!-- Header -->
          <CardHeader class="border-b">
            <div class="flex items-center justify-between gap-4">
              <div class="flex items-center gap-4">
                <Button variant="ghost" size="icon" @click="goBack">
                  <ChevronLeft />
                </Button>
                <Avatar><img src="/images/avatar-2.jpg" alt="Anna"/></Avatar>
                <div>
                  <p class="font-semibold">Anna Clarke</p>
                  <p class="text-xs text-muted-foreground">Product Manager • Online</p>
                </div>
              </div>

              <div class="flex items-center gap-2">
                <Button variant="ghost" size="icon" title="Call">
                  <Phone />
                </Button>
                <Button variant="ghost" size="icon" title="More">
                  <MoreVertical />
                </Button>
              </div>
            </div>
          </CardHeader>

          <!-- Messages -->
          <CardContent class="p-6 overflow-auto" ref="messageList">
            <div class="space-y-6">
              <!-- Date divider -->
              <div class="flex items-center justify-center">
                <span class="bg-slate-100 text-xs px-3 py-1 rounded-full">Today</span>
              </div>

              <!-- Received message -->
              <div class="flex items-start gap-3">
                <Avatar size="sm"><img src="/images/avatar-2.jpg" alt="Anna"/></Avatar>
                <div>
                  <div class="bg-white p-3 rounded-xl shadow-sm max-w-prose">
                    <p class="text-sm">Hey! Are you free for a quick call about the project?</p>
                  </div>
                  <div class="text-xs text-muted-foreground mt-1">2:10 PM</div>
                </div>
              </div>

              <!-- Sent message -->
              <div class="flex items-end justify-end">
                <div class="text-right">
                  <div class="inline-block bg-sky-600 text-white p-3 rounded-xl shadow-sm max-w-prose">
                    <p class="text-sm">Yeah — give me 10 minutes.</p>
                  </div>
                  <div class="text-xs text-muted-foreground mt-1">2:12 PM • <Check /></div>
                </div>
              </div>

              <!-- Typing indicator -->
              <div v-if="typing" class="flex items-start gap-3">
                <Avatar size="sm"><img src="/images/avatar-2.jpg" alt="Anna"/></Avatar>
                <div class="bg-white p-2 rounded-xl shadow-sm">
                  <div class="flex gap-1 items-center px-2 py-1">
                    <span class="dot h-2 w-2 rounded-full animate-pulse bg-slate-500"></span>
                    <span class="dot h-2 w-2 rounded-full animate-pulse bg-slate-500 delay-150"></span>
                    <span class="dot h-2 w-2 rounded-full animate-pulse bg-slate-500 delay-300"></span>
                  </div>
                </div>
              </div>

            </div>
          </CardContent>

          <!-- Composer -->
          <CardFooter class="border-t">
            <div class="flex items-center gap-3">
              <Button variant="ghost" size="icon" @click="attachFile">
                <Paperclip />
              </Button>

              <div class="flex-1">
                <form @submit.prevent="sendMessage" class="flex gap-3">
                  <Input v-model="message" placeholder="Type a message..." />
                  <Button type="submit">Send</Button>
                </form>
                <div class="flex items-center justify-between text-xs text-muted-foreground mt-2">
                  <span>Press Enter to send</span>
                  <span>{{ message.length }}/1000</span>
                </div>
              </div>
            </div>
          </CardFooter>
        </Card>
      </main>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted, nextTick } from 'vue';
import { Card, CardHeader, CardContent, CardFooter } from '@/components/ui/card';
import { Avatar } from '@/components/ui/avatar';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Plus, ChevronLeft, Phone, MoreVertical, Paperclip, Check } from 'lucide-vue-next';

const message = ref('');
const typing = ref(false);
const messageList = ref(null);

function goBack(){
  // your navigation logic
  history.back();
}

function attachFile(){
  // open file picker
  alert('Attach file (implement)');
}

function sendMessage(){
  if(!message.value.trim()) return;
  // push message to list (mock)
  // In real app, emit to server (WebSocket) or post to API
  message.value = '';
  typing.value = false;
  // scroll to bottom
  nextTick(() => {
    if(messageList.value) messageList.value.scrollTop = messageList.value.scrollHeight;
  });
}

onMounted(() => {
  // mock typing indicator
  setTimeout(() => { typing.value = true; }, 1500);
  setTimeout(() => { typing.value = false; }, 4000);
});
</script>

<style scoped>
.max-w-prose { max-width: 60ch; }
.text-muted-foreground { color: rgba(100,100,110,0.85); }
.dot { opacity: 0.9; }
</style>
