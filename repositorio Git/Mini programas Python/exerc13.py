import datetime

def horario():
    h1 = datetime.datetime.now().time()
    hora = h1.hour

    if hora > 6 and hora < 12:
        h = "manhã"
    elif hora < 18:
        h = "tarde"
    else:
        h = "noite"
    
    return h

print( "esta de",horario())
