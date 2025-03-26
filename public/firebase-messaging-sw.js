importScripts(
    'https://www.gstatic.com/firebasejs/11.5.0/firebase-app-compat.js'
)
importScripts(
    'https://www.gstatic.com/firebasejs/11.5.0/firebase-messaging-compat.js'
)

const firebaseConfig = {
    apiKey: 'AIzaSyAoJB_VOp1VnsF-MOm0Mbmb0_hd_P0UI7E',
    authDomain: 'dncloud-work.firebaseapp.com',
    projectId: 'dncloud-work',
    storageBucket: 'dncloud-work.firebasestorage.app',
    messagingSenderId: '983747092017',
    appId: '1:983747092017:web:6cec5fbf4f6355a4623f10',
    measurementId: 'G-H303FL6HHR',
}

firebase.initializeApp(firebaseConfig)
const messaging = firebase.messaging()

messaging.onBackgroundMessage(function (payload) {
    console.log(
        '[firebase-messaging-sw.js] Received background message ',
        payload
    )
    const notificationTitle = payload.data.title
    const notificationOptions = {
        body: payload.data.body,
        icon: payload.data.icon,
    }

    self.registration.showNotification(notificationTitle, notificationOptions)
})
