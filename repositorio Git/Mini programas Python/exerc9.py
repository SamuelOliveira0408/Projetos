import random

def adivinhar_palavra_secreta():
    palavras = ["academia", "youtube", "computador", "moto", "gordura", "força", "morango", "cachorro"]
    sorteia = random.choice(palavras)
    

    p = input("Digite uma palavra para descobrir se é a palavra secreta: ")

    while p!=sorteia:
    
        if sorteia == palavras[0]:
            print("\nA palavra se refere ao lugar onde as pessoas vão para esculpir seus corpos.")
        elif sorteia == palavras[1]:
            print("\nA palavra se refere a uma plataforma de assistir vídeos.")
        elif sorteia == palavras[2]:
            print("\nÉ um objeto capaz de fazer tudo sem o usuário precisar se levantar.")
        elif sorteia == palavras[3]:
            print("\nÉ um veículo que cabe apenas 1 passageiro.")
        elif sorteia == palavras[4]:
            print("\nNormalmente aparece em pessoas sedentárias.")
        elif sorteia == palavras[5]:
            print("\nA palavra está relacionada a indivíduos com músculos.")
        elif sorteia == palavras[6]:
            print("\nÉ uma fruta de cor vermelha.")
        elif sorteia == palavras[7]:
            print("\nA palavra se refere a um animal de estimação.")
        p=str (input("A palavra estava incorreta. Digite novamente: "))

        if p == sorteia:
            print("Você acertou, a palavra era", sorteia)

adivinhar_palavra_secreta()
