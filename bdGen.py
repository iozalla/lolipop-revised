import random


namesFile = open("names.txt", 'r')
names=namesFile.readlines()
namesFile.close()
db=open("generatedDB.txt",'w')
letrasDNI=["T", "R", "W", "A", "G", "M,","Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"]
print(len(letrasDNI))
print(letrasDNI)
print(letrasDNI[22])
sexos=["m","f","nb","n"]#male, female, non binary, not specified
def generarDni(letras):
    try:
        numDNI=random.randint(11111111,99999999)
        #print("DNI",numDNI,numDNI%23)
        letra=letras[numDNI%23]

        DNI=str(numDNI)+letra
    except Exception as e:
        print("EROR DNI",numDNI,numDNI%23)

        #print(DNI)
    return DNI

def generarSexo(sexos):
    rn=random.randint(0,len(sexos)-1)
    return sexos[rn]
i=0
for name in names:
    i=i+1
    rnd=random.randint(1,len(names))
    edad=str(random.randint(18,80))
    DNI=generarDni(letrasDNI)

    gustos="pelota"
    altura=str(1.75)
    sexo=generarSexo(sexos)
    peso=str(random.randint(40,150))
    str2="("+str(i)+", '"+name.rstrip()+"', '"+names[rnd-1].rstrip()+"', '"+DNI+"', '"+sexo+"', '"+"sexualidad"+"', "+edad+", '"+gustos+"', "+altura+", "+peso+"),\n"
    db.writelines(str2)
