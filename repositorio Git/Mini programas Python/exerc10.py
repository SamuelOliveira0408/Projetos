import random


moeda = ["cara", "coroa"]
sorteia = random.choice(moeda)

def jogar_moeda():
    contcara = 0
    contcoroa = 0
    m=1

    while m==1:
        m = int(input("Escolha 1 para lançar a moeda e 0 para finalizar a leitura:\n"))

        if m == 0:
            break
        elif m != 1:
            m=int(input("Valor inválido, digite novamente: "))

        if m == 1:
            sorteia = random.choice(moeda)
        
            if sorteia == moeda[0]:
                print("Caiu", sorteia)
                contcara += 1
            elif sorteia == moeda[1]:
                print("Caiu", sorteia)
                contcoroa += 1

    print("Quantidade de jogadas cara:", contcara, "Quantidade de jogadas coroa:", contcoroa)

jogar_moeda()