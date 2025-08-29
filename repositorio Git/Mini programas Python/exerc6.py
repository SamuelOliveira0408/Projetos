import random

def adivinhar():
    
    numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
    sorteado = random.choice(numeros)

    n = int(input("Tente adivinhar um número de 1 a 15: "))
    if n == sorteado:
        return f"Você acertou! O número é {n}"
    else:
        while n != sorteado:
            n=int(input("Você errou, tente novamente: "))
        else:
            return f"Você acertou! O número é {n}"

print(adivinhar())
