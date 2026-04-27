<div class="mt-20 reveal stagger-8" id="contact">
  <div class="glass-panel rounded-3xl p-8 md:p-16 relative overflow-hidden">
    <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px]"></div>
    
    <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center">
      
      <!-- Left: Contact Info -->
      <div class="text-left">
        <span class="text-xs uppercase tracking-[0.3em] text-primary/60 font-bold mb-4 block">{{ site_t('contact.kicker') ?? 'Contact Us' }}</span>
        <h2 class="font-headline text-3xl md:text-5xl font-bold text-white mb-6 tracking-tight">
          {{ site_t('contact.title_line') ?? 'Let\'s build something' }} <span class="text-gradient">{{ site_t('contact.title_gradient') ?? 'great together' }}</span>
        </h2>
        <p class="text-on-surface-variant text-lg mb-10 font-light max-w-md">
          {{ site_t('contact.intro') ?? 'Reach out to us for inquiries, project proposals, or just to say hello. We are always ready to listen.' }}
        </p>

        <div class="space-y-6">
            <a href="tel:+201204542303" class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-primary/50 transition group">
                <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">call</span>
                </div>
                <div>
                    <p class="text-sm text-slate-400 mb-1">Call Us</p>
                    <p class="text-white font-semibold tracking-wide">+20 12 04542303</p>
                </div>
            </a>
            
            <a href="mailto:info@codiing-solutions.com" class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-primary/50 transition group">
                <div class="w-12 h-12 rounded-xl bg-primary/20 flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">mail</span>
                </div>
                <div>
                    <p class="text-sm text-slate-400 mb-1">Email Us</p>
                    <p class="text-white font-semibold tracking-wide">info@codiing-solutions.com</p>
                </div>
            </a>
        </div>
      </div>

      <!-- Right: Contact Form -->
      <div class="bg-black/20 rounded-3xl p-8 border border-white/10 shadow-2xl backdrop-blur-xl">
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-500/20 border border-green-500/30 text-green-400 text-sm flex items-center gap-3">
                <span class="material-symbols-outlined">check_circle</span>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-2">
                    <label for="name" class="text-sm text-slate-300 font-medium">Full Name</label>
                    <input type="text" id="name" name="name" required placeholder="John Doe" 
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/50 transition">
                    @error('name') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>
                
                <div class="space-y-2">
                    <label for="email" class="text-sm text-slate-300 font-medium">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="john@example.com"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/50 transition">
                    @error('email') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="space-y-2">
                    <label for="phone" class="text-sm text-slate-300 font-medium">Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="+1 234 567 890"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/50 transition">
                    @error('phone') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="space-y-2">
                    <label for="subject" class="text-sm text-slate-300 font-medium">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Project Inquiry"
                        class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/50 transition">
                    @error('subject') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="space-y-2">
                <label for="message" class="text-sm text-slate-300 font-medium">Message</label>
                <textarea id="message" name="message" required rows="4" placeholder="Tell us about your project..."
                    class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-primary/50 focus:ring-1 focus:ring-primary/50 transition resize-none"></textarea>
                @error('message') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full hero-gradient text-white rounded-xl py-4 font-bold tracking-wide shadow-lg shadow-primary/20 hover:shadow-primary/40 transition flex items-center justify-center gap-2 group">
                Send Message
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">send</span>
            </button>
        </form>
      </div>

    </div>
  </div>
</div>
