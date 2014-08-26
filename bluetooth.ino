#include <SoftwareSerial.h>

#define rxPin 2
#define txPin 3

SoftwareSerial mySerial(rxPin, txPin);

void setup()
{
  // define pin modes for tx, rx pins:
  pinMode(rxPin, INPUT);
  pinMode(txPin, OUTPUT);
  mySerial.begin(38400);
  Serial.begin(38400);

  mySerial.print("at+reset\r\n");
  delay(100);
  mySerial.print("at+init\r\n");
  delay(100);
  while(mySerial.available()){
      Serial.print((char)mySerial.read());    
  }
}
 
void loop()
{
  if(Serial.available)
  {
    char c = Serial.read();
    if(c == 'S'){
      mySerial.print("at+inq\r\n");
    }
  }
  while(mySerial.available()) 
      Serial.print((char)mySerial.read());    
}

