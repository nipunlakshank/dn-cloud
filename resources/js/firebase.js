import { initializeApp } from 'firebase/app'
import { getMessaging, getToken, onMessage } from 'firebase/messaging'

const firebaseConfig = {
    apiKey: 'AIzaSyAoJB_VOp1VnsF-MOm0Mbmb0_hd_P0UI7E',
    authDomain: 'dncloud-work.firebaseapp.com',
    projectId: 'dncloud-work',
    storageBucket: 'dncloud-work.firebasestorage.app',
    messagingSenderId: '983747092017',
    appId: '1:983747092017:web:6cec5fbf4f6355a4623f10',
    measurementId: 'G-H303FL6HHR',
}

const app = initializeApp(firebaseConfig)
const messaging = getMessaging(app)

async function registerServiceWorker() {
    navigator.serviceWorker
        ?.register('/firebase-messaging-sw.js')
        .then(registration => {
            console.log('Service Worker registered:', registration)
        })
        .catch(err => {
            console.error('Service Worker registration failed:', err)
        })
}

async function getFcmToken() {
    try {
        const token = await getToken(messaging, {
            vapidKey: 'BD81rv4pxUvUAMQwoR1-aYs6LdgNpv97UQ8qtHwv5dtum7mq4ljzXhSV8stWNvZ3ynjtxHR4La4jZEYW_inPgcE',
        })
        return token
    } catch (err) {
        console.error(err)
    }
}

function saveFcmToken(token) {
    try {
        axios.post('/fcm-tokens', { token: token })
    } catch (err) {
        console.error(err)
    }
}

/**
 * @param {bool} requestPermissions - Whether to request  notification permissions if not granted
 */
async function initNotifications(requestPermissions = false) {
    if (Notification.permission === 'granted') {
        registerServiceWorker()
        const token = await getFcmToken()
        console.log('FCM Token:', token)
        saveFcmToken(token)
    } else if (requestPermissions) {
        await Notification.requestPermission()
        initNotifications(false)
    }
}

onMessage(messaging, payload => {
    console.log('Message received in foreground:', payload)
})

initNotifications()

window.addEventListener('requestNotificationsPermission', () => initNotifications(true))
