import pyttsx3
import speech_recognition as sr
import datetime
engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
#print(voices[1].id)
engine.setProperty('voices', voices[1].id)

def speak(audio):
    engine.say(audio)
    engine.runAndWait()

def wishMe():
    hour = int(datetime.datetime.now().hour)
    if hour>=0 and hour<12:
    	speak("GOOD Morning!")
    elif hour>=12 and hour<18:
    	speak("Good Afternoon!")
    elif hour>=18 and hour<24:
    	speak("Good night")
    	print("Good night")
    else:
    	speak("Good Evening")
    speak("Nama saya adalah ferdi. Saya sangat mencintaimu safina")
    print("Nama saya adalah ferdi. Saya sangat mencintaimu safina")

def takeCommand():
	r = sr.Recognizer()
	with sr.Microphone() as source:
		print("Listening...")
		r.pause_threshold = 1
		audio = r.listen(source)
	try:
		print("Recogniting...")
		query = r.recognize.google(audio, Languange='en-in')
		print(f"User said: {query}\n")
	except Exception as e:
		print(e)
		print("Say that again please...")
		return "None"
	return query
if __name__ == "__main__":
    wishMe()
    #query = takeCommand().lower()