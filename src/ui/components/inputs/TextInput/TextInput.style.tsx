import styled from "@emotion/native";
import { TextInput } from "react-native-paper";

export const TextInputStyled = styled(TextInput)`
  margin-left: ${({ theme }) => theme.spacing(1)};
  margin-right: ${({ theme }) => theme.spacing(1)};
`;

TextInputStyled.defaultProps = {
  mode: "outlined",
};
