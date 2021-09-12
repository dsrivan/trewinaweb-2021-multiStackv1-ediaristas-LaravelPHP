import React, { useState } from "react";
import { useTheme } from "@emotion/react";
import { ScrollView } from "react-native";
import PageTitle from "ui/components/data-display/PageTitle/PageTitle";
import TextInput from "ui/components/inputs/TextInput/TextInput";
import { TextInputMask } from "react-native-masked-text";
import Button from "ui/components/inputs/Button/Button";
import UserInformation from "ui/components/data-display/UserInformation/UserInformation";
import {
  FormContainer,
  TextContainer,
  ErrorText,
  ResponseContainer,
} from "@styles/pages/encontrar-diarista.styled";

const EncontrarDiaristas: React.FC = () => {
  const { colors } = useTheme();
  const [cep, setCep] = useState("");

  return (
    <ScrollView>
      <PageTitle
        title={"Conheça os profissionais"}
        subtitle={
          "Preencha seu endereço e veja todos os profissionais da sua localidade"
        }
      />
      <FormContainer>
        <TextInputMask
          value={cep}
          onChangeText={setCep}
          type={"custom"}
          options={{
            mask: "99.999-999",
          }}
          customTextInput={TextInput}
          customTextInputProps={{
            label: "Digite seu CEP",
          }}
        />

        <ErrorText>CEP não encontrado</ErrorText>

        <Button
          mode={"contained"}
          style={{ marginTop: 32 }}
          color={colors.accent}
        >
          Buscar
        </Button>
      </FormContainer>

      <ResponseContainer>
        <UserInformation
          picture={"https://github.com/dsrivan.png"}
          name={"Ivan SilvaRosa"}
          rating={4}
          description={"Cosmorama"}
          darker={false}
        />
        <UserInformation
          picture={"https://github.com/dsrivan.png"}
          name={"Ivan SilvaRosa"}
          rating={3}
          description={"Cosmorama"}
          darker={false}
        />
        <UserInformation
          picture={"https://github.com/dsrivan.png"}
          name={"Ivan SilvaRosa"}
          rating={5}
          description={"Cosmorama"}
          darker={false}
        />

        <TextContainer>
          ... e mais X profissionais atendem ao seu endereço.
        </TextContainer>

        <Button color={colors.accent} mode={"contained"}>
          Contratar um profissional
        </Button>

        <TextContainer>
          Ainda não temos nenhuma diarista disponível em sua região
        </TextContainer>
      </ResponseContainer>
    </ScrollView>
  );
};

export default EncontrarDiaristas;
