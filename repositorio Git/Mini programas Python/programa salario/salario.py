
def calcular_gastos(gastos):
    gastos = sum(gastos) #sum é p somar tudo q está na lista
    return gastos

contas=["Moradia", "Alimentação", "Transporte", "Contas (água, luz, etc.)"]
gastos=[0] * len(contas)
salario = float(input("Digite o seu salário mensal: R$"))

opcao = 0
while opcao != 4:
    print("\nItens básicos:")
    i=0
    while i <len(contas):
        print(i+1, "-", contas[i], ": R$",gastos[i])
        i=i+1

    print("\nOpções:")
    print("1 - Adicionar Item\n2 - Remover Item\n3 - Modificar Preço\n4 - Calcular Total de Gastos")

    opcao = int(input("\nEscolha uma opção: "))

    if opcao==1:
        nitem=input("Digite o nome do novo item: ")
        npreco=float(input("Digite seu preço mensal: R$"))
        contas.append(nitem) # o append adiciona o item no final da lista
        gastos.append(npreco)

    elif opcao == 2:
        print("\nItens disponíveis para remoção:")
        i = 0
        while i < len(contas):
            print(i + 1, "-", contas[i])
            i += 1
        remover = int(input("Escolha o número do item a ser removido: "))
        if 1 <=remover <= len(contas):
            itemr = contas.pop(remover - 1) # o pop remove o item da lista
            gastos.pop(remover - 1)
        else:
            print("Opção inválida.")



    elif opcao == 3:
        modificar = 1
        while modificar !=len(contas):
            print("\nItens disponíveis para modificação de preço:")
            i=0
            while i<len(contas):
                print(i+1," - ",contas[i],": R$",gastos[i])
                i=i+1

            print(len(contas)+1," -  Sair")
            modificar = int(input("Escolha o número do item a ser modificado: "))-1
            if modificar >= 0 and modificar < len(contas):
                npreco = float(input("Digite o novo preço mensal do item: R$"))
                gastos[modificar] = npreco
        
        else:
            print("Saindo")

    elif opcao==4:
        gastos =calcular_gastos(gastos)
        sobra= salario-gastos
        print("\nTotal de dinheiro gasto: R$",gastos)
        print("Quantidade que restou do seu salário: R$",sobra)
        if sobra >= 200:
            print("Você está gastando dentro do seu salário. Bom trabalho!")
        else:
            print("Atenção: Está restando pouco dinheiro ou seus gastos básicos excedem seu salário. Economize!")

    else:
        print("Opção inválida.")
