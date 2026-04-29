@extends('web.layouts.app')

@section('content')
<div class="pt-20 md:pt-32 pb-20 max-w-7xl mx-auto px-4 sm:px-6" id="contact-page">
  <div class="glass-panel rounded-3xl p-6 sm:p-8 md:p-16 relative overflow-hidden">
    <div class="absolute -top-40 left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[120px]"></div>
    
    <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-20 items-start">
      
      <!-- Left: Contact Info -->
      <div class="text-left space-y-8">
        <div>
          <span class="text-xs uppercase tracking-[0.3em] text-primary/60 font-bold mb-4 block">{{ site_t('contact.kicker') ?? 'Contact Us' }}</span>
          <h2 class="font-headline text-3xl md:text-5xl font-bold text-white mb-6 tracking-tight">
            {{ site_t('contact.title_line') ?? 'Let\'s build something' }} <span class="text-gradient">{{ site_t('contact.title_gradient') ?? 'great together' }}</span>
          </h2>
          <p class="text-on-surface-variant text-base md:text-lg font-light max-w-md">
            {{ site_t('contact.intro') ?? 'Reach out to us for inquiries, project proposals, or just to say hello. We are always ready to listen.' }}
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">
            @if(site_t('contact.phone'))
            <a href="tel:{{ str_replace(' ', '', site_t('contact.phone')) }}" class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-primary/50 transition group">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-primary/20 flex items-center justify-center text-primary group-hover:scale-110 transition-transform shrink-0">
                    <span class="material-symbols-outlined text-xl md:text-2xl">call</span>
                </div>
                <div class="min-w-0">
                    <p class="text-[10px] md:text-sm text-slate-400 mb-0.5 md:mb-1">Call Us</p>
                    <p class="text-white font-semibold tracking-wide text-sm md:text-base truncate" dir="ltr">{{ site_t('contact.phone') }}</p>
                </div>
            </a>
            @endif
            
            @if(site_t('contact.email'))
            <a href="mailto:{{ site_t('contact.email') }}" class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-primary/50 transition group">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-primary/20 flex items-center justify-center text-primary group-hover:scale-110 transition-transform shrink-0">
                    <span class="material-symbols-outlined text-xl md:text-2xl">mail</span>
                </div>
                <div class="min-w-0">
                    <p class="text-[10px] md:text-sm text-slate-400 mb-0.5 md:mb-1">Email Us</p>
                    <p class="text-white font-semibold tracking-wide text-sm md:text-base truncate">{{ site_t('contact.email') }}</p>
                </div>
            </a>
            @endif

            @if(site_t('contact.location'))
            <div class="flex items-center gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 transition group sm:col-span-2 lg:col-span-1">
                <div class="w-10 h-10 md:w-12 md:h-12 rounded-xl bg-primary/20 flex items-center justify-center text-primary group-hover:scale-110 transition-transform shrink-0">
                    <span class="material-symbols-outlined text-xl md:text-2xl">location_on</span>
                </div>
                <div class="min-w-0">
                    <p class="text-[10px] md:text-sm text-slate-400 mb-0.5 md:mb-1">Location</p>
                    <p class="text-white font-semibold tracking-wide text-sm md:text-base">{{ site_t('contact.location') }}</p>
                </div>
            </div>
            @endif
        </div>

        @if(site_t('contact.whatsapp') || site_t('contact.facebook') || site_t('contact.linkedin') || site_t('contact.instagram') || site_t('contact.twitter'))
        <div class="pt-6 border-t border-white/10">
            <p class="text-xs uppercase tracking-wider font-semibold text-slate-500 mb-4">Connect with us</p>
            <div class="flex flex-wrap gap-3 md:gap-4">
                @if(site_t('contact.whatsapp'))
                <a href="{{ site_t('contact.whatsapp') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 md:w-11 md:h-11 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-green-500 hover:border-green-500 hover:text-white transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </a>
                @endif
                @if(site_t('contact.facebook'))
                <a href="{{ site_t('contact.facebook') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 md:w-11 md:h-11 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-[#1877F2] hover:border-[#1877F2] hover:text-white transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                </a>
                @endif
                @if(site_t('contact.linkedin'))
                <a href="{{ site_t('contact.linkedin') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 md:w-11 md:h-11 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-[#0A66C2] hover:border-[#0A66C2] hover:text-white transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" clip-rule="evenodd" /></svg>
                </a>
                @endif
                @if(site_t('contact.instagram'))
                <a href="{{ site_t('contact.instagram') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 md:w-11 md:h-11 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-[#E4405F] hover:border-[#E4405F] hover:text-white transition-all shadow-lg">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                </a>
                @endif
                @if(site_t('contact.twitter'))
                <a href="{{ site_t('contact.twitter') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 md:w-11 md:h-11 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-white hover:bg-black hover:border-black hover:text-white transition-all shadow-lg">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.008 5.93H5.078z"/></svg>
                </a>
                @endif
            </div>
        </div>
        @endif
      </div>

      <!-- Right: Contact Form -->
      <div class="flex justify-center w-full lg:justify-end">
        <div class="bg-black/40 rounded-[2rem] md:rounded-[2.5rem] p-5 sm:p-8 md:p-10 border border-white/10 shadow-2xl backdrop-blur-3xl w-full lg:max-w-xl relative group/form overflow-hidden">
          <div class="absolute inset-0 bg-linear-to-br from-primary/5 via-transparent to-transparent opacity-0 group-hover/form:opacity-100 transition-opacity duration-700"></div>
          
          <div class="relative z-10">
            <h3 class="font-headline text-2xl font-bold text-white mb-8 flex items-center gap-3">
              <span class="w-8 h-[2px] bg-primary rounded-full"></span>
              {{ site_t('contact.form_title') ?? 'Send a Message' }}
            </h3>

            @if(session('success'))
                <div class="mb-8 p-4 rounded-2xl bg-green-500/10 border border-green-500/20 text-green-400 text-sm flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-500">
                    <span class="material-symbols-outlined text-xl">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="name" class="text-xs text-slate-400 font-bold uppercase tracking-widest ml-1">Full Name</label>
                        <input type="text" id="name" name="name" required placeholder="John Doe" 
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:border-primary/50 focus:bg-white/[0.07] focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-sm md:text-base">
                        @error('name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="space-y-2">
                        <label for="email" class="text-xs text-slate-400 font-bold uppercase tracking-widest ml-1">Email Address</label>
                        <input type="email" id="email" name="email" required placeholder="john@example.com"
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:border-primary/50 focus:bg-white/[0.07] focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-sm md:text-base">
                        @error('email') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="phone" class="text-xs text-slate-400 font-bold uppercase tracking-widest ml-1">Phone Number</label>
                        <input type="text" id="phone" name="phone" placeholder="+1 234 567 890"
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:border-primary/50 focus:bg-white/[0.07] focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-sm md:text-base">
                        @error('phone') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="subject" class="text-xs text-slate-400 font-bold uppercase tracking-widest ml-1">Subject</label>
                        <input type="text" id="subject" name="subject" placeholder="Project Inquiry"
                            class="w-full bg-white/[0.03] border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:border-primary/50 focus:bg-white/[0.07] focus:ring-4 focus:ring-primary/10 transition-all duration-300 text-sm md:text-base">
                        @error('subject') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="message" class="text-xs text-slate-400 font-bold uppercase tracking-widest ml-1">Message</label>
                    <textarea id="message" name="message" required rows="4" placeholder="Tell us about your project..."
                        class="w-full bg-white/[0.03] border border-white/10 rounded-2xl px-5 py-4 text-white placeholder-slate-600 focus:outline-none focus:border-primary/50 focus:bg-white/[0.07] focus:ring-4 focus:ring-primary/10 transition-all duration-300 resize-none text-sm md:text-base min-h-[120px]"></textarea>
                    @error('message') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="w-full hero-gradient text-white rounded-2xl py-4 md:py-5 font-bold tracking-widest uppercase text-xs md:text-sm shadow-xl shadow-primary/20 hover:shadow-primary/40 hover:scale-[1.01] active:scale-[0.99] transition-all duration-300 flex items-center justify-center gap-3 group/btn">
                    {{ site_t('contact.send_btn') ?? 'Send Message' }}
                    <span class="material-symbols-outlined group-hover/btn:translate-x-1 group-hover/btn:-translate-y-1 transition-transform text-lg md:text-xl">north_east</span>
                </button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
