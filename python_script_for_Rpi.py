from firebase import firebase
import time
import datetime
import RPi.GPIO as GPIO
firebase=firebase.FirebaseApplication('https://rashdetector.firebaseio.com/',None)
def sensorCallback(channel):
  # Called if sensor output changes
  timestamp = time.time()
  stamp = datetime.datetime.fromtimestamp(timestamp).strftime('%H:%M:%S')
  if GPIO.input(channel):
    # No magnet
    print("Sensor HIGH " + stamp)

    sec=int(round(time.time()*1000))
    #  res=firebase.put(
'/Users/User1/Vehicle1/Sensor1/user1',sec,{'lat':57.322,'longt':67.67})
    return sec
  else:
    # Magnet
    print("Sensor LOW " + stamp)
    sec=int(round(time.time()*1000))
     # res=firebase.put(
'/Users/User1/Vehicle1/Sensor1/user1',sec,{'lat':57.322,'longt':67.67})
    return sec
def main():
  # Wrap main content in a try block so we can
  # catch the user pressing CTRL-C and run the
  # GPIO cleanup function. This will also prevent
  # the user seeing lots of unnecessary error
  # messages.
  i=0
  a=[2]
  # Get initial reading

  a[0]=sensorCallback(17)
  a[1]=sensorCallback(17)
   #if i>3:
  speed=a[1]-a[0]
  print(speed)
  res=firebase.put( '/Users/User1/Vehicle1/Sensor1/user1',speed,{'speed':speed})
  try:
     #Loop until users quits with CTRL-C
     while i<5:
       time.sleep(0.1)
       i+=1

  except KeyboardInterrupt:
     #Reset GPIO settings
     GPIO.cleanup()

# Tell GPIO library to use GPIO references
GPIO.setmode(GPIO.BCM)

print("Setup GPIO pin as input on GPIO17")

# Set Switch GPIO as input
# Pull high by default
GPIO.setup(17 , GPIO.IN, pull_up_down=GPIO.PUD_UP)
GPIO.add_event_detect(17, GPIO.BOTH, callback=sensorCallback, bouncetime=200)

if __name__=="__main__":
   main()

