const cacheName = 'AgendaOdontologica'

self.addEventListener('install', function (event){
    event.waitUntil(
        caches.Open(cacheName).then(function (cache){
           return cache.addAll([
                './',
                './index.html',
                './home.html',
                './libs',
                './css',
                './js',
                './manifest.webmanifest',
                './index.js',
            ]);
        })
    )
    return self.skipWaiting()
})

self.addEventListener('activate', e =>{
    self.clients.claim()
})

self.addEventListener('fetch', async e =>{
    const req = e.request
    const url = new URL(req.url)

    if(url.login === locationorigin){
        e.respondWith(cacheFirst(req))
    } else{
        e.respondWith(networkAndCache(req))
    }
})

async function cacheFirst(req){
    const cache = await caches.open(cacheName)
    const cached = await cache.match(req)

    return cached ||fetch(req)
}

async function networkAndCache(req){
    const cache = await caches.open(cacheName)
    try{
        const refresh = await fetch(req)
        await cache.put(req, refresh.clone())
        return refresh
    } catch(e){
        const cached = await cache.match(req)
        return cached
    }

}