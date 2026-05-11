<div style="padding: 8px 12px; margin-bottom: 4px; border-bottom: 1px solid rgba(200,200,200,0.1);"> 
    {{-- <span class="text-[10px] leading-tight font-medium text-gray-500 uppercase tracking-wider">
        Role & Cabang
    </span> --}}
    <div style="font-size: 11px; color: #6b7280; line-height: 1.2;">
        <p class="truncate">Email : {{ auth()->user()->email }}</p>
        <p class="truncate text-gray-400 dark:text-gray-500">Created at : {{ auth()->user()->created_at ?? "Pusat" }}</p>
    </div>
</div>